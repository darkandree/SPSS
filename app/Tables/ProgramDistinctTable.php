<?php

namespace App\Tables;

use App\Models\FundSourceView;
use App\Models\CalendarYearView;
use App\Models\ProgramDistinctView;


use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Collection;

use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\FormBuilder\Input;

class ProgramDistinctTable extends AbstractTable
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
                        ->orWhere('id', 'LIKE', "%{$value}%")
                        ->orWhere('CALENDARYEAR_ID', 'LIKE', "%{$value}%")
                        ->orWhere('Programs', 'LIKE', "%{$value}%")
                        ->orWhere('Calendar_Year', 'LIKE', "%{$value}%");
                });
            });
        });
 
        return QueryBuilder::for(ProgramDistinctView::class)
        ->orderByDesc('Calendar_Year')
        ->defaultSort('Programs')
        ->allowedSorts('id' ,'Programs','CALENDARYEAR_ID','Calendar_Year')
        ->allowedFilters([
            'id' ,
            'Programs',
            AllowedFilter::exact('CALENDARYEAR_ID'),
            'Calendar_Year',
            $globalSearch
        ]);
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
            ->column('id', sortable: true, hidden:false, searchable:true)
            ->column('action')

            ->column('Programs', 'Program', sortable: true,hidden:false,searchable:true)
            ->column('CALENDARYEAR_ID', 'CalendarYearId', sortable: false,hidden:true,searchable:false)
            ->column('Calendar_Year', 'Calendar Year', sortable: false,hidden:false,searchable:false)


     

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
