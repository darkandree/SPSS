<?php

namespace App\Tables;

use App\Models\FundSourceView;
use App\Models\CalendarYearView;


use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Collection;

use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\FormBuilder\Input;

class FundSourceTable extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                        $query
                   //->join('personnels','inventories.personnel_id', '=', 'personnels.id')->select('inventories.*', 'personnels.personnel as personnelname')
                        ->orWhere('id', 'LIKE', "%{$value}%")
                        ->orWhere('PROGRAMSNAME', 'LIKE', "%{$value}%")
                        ->orWhere('CALENDARYEARNAME', 'LIKE', "%{$value}%");
                });
            });
        });
 
        return QueryBuilder::for(FundSourceView::class)
        ->orderByDesc('CALENDARYEARNAME')
        ->defaultSort('FUNDSOURCE')
        ->allowedSorts('id' ,'FUNDSOURCE','PROGRAMSNAME','CALENDARYEAR_ID','CALENDARYEARNAME','FS_DESCRIPTION')
        ->allowedFilters(['id' ,'FUNDSOURCE','PROGRAMSNAME','CALENDARYEAR_ID','CALENDARYEARNAME','FS_DESCRIPTION', $globalSearch]);
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {

        $table
            ->withGlobalSearch(columns: ['id'])
            ->column('id', sortable: true,searchable:true)
            ->column('action')
            ->column('CALENDARYEAR_ID', 'FundSource', sortable: true,hidden:true,searchable:false)
            ->column('CALENDARYEARNAME', 'CalendarYear', sortable: true,hidden:false,searchable:true)
            ->column('PROGRAMSNAME', 'Programs', sortable: true,hidden:false,searchable:true)
           

            ->selectFilter(
                key: 'CALENDARYEAR_ID',
                options: CalendarYearView::orderByDesc('Calendar_Year')->pluck('Calendar_Year','id')->toArray(),
                label: 'Calendar Year',
                noFilterOption: true,
                noFilterOptionLabel: 'All',
            )

            
            // ->bulkAction(
            //     label: 'Return Forms',
            //     each: fn (RSBSAFormView $rsbsa) => RSBSAFormStatus::where('document_id',$rsbsa->document_id)->update(['returnedto_id' => Auth::user()->emp_id,'date_returned' => now() ]),
            //     confirm: 'Return Forms',
            //     confirmText: 'Are you sure you want to update the selected records?',
            //     confirmButton: 'Update',
            //     cancelButton: 'Cancel',
            //     after: fn() => Toast::info('Record Updated')->autoDismiss(3)
            // )
            
            // ->bulkAction(
            //     label: 'Delete Records',
            //     each: fn (RSBSAFormView $rsbsa) => RSBSAForm::where('id',$rsbsa->id)->delete(),
            //     confirm: 'Deleting Records',
            //     confirmText: 'Are you sure you want to delete the selected records?',
            //     confirmButton: 'Delete',
            //     cancelButton: 'Cancel',
            //     after: fn() => Toast::danger('Record Deleted')->autoDismiss(3)
            // )
            
            ->paginate(15)
            ->export();
      
    }
}
