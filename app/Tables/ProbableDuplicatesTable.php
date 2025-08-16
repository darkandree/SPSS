<?php

namespace App\Tables;

use App\Models\ProbableDuplicatesView;

use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Collection;

use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\FormBuilder\Input;

class ProbableDuplicatesTable extends AbstractTable
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
                        ->orWhere('id','fullname', 'LIKE', "%{$value}%")
                        ->orWhere('id','NoDuplicates', 'LIKE', "%{$value}%");
                });
            });
        });
 
//dd(Division::class);
//dd(QueryModel::QueryInventory());
        return QueryBuilder::for(ProbableDuplicatesView::class)
        ->allowedSorts('id','fullname','NoDuplicates')
        ->allowedFilters(['id','fullname','NoDuplicates', $globalSearch]);
    
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
            ->column('action')
            ->column('id', sortable: true,searchable:true)
            ->column('fullname', sortable: true,searchable:true)
            ->column('NoDuplicates', sortable: true,hidden:false,searchable:false)

            // ->selectFilter(
            //     key: 'DOCUMENTSTATUS',
            //     options: DocsCategoryStatusView::all()->pluck('category_status','category_status')->toArray(),
            //     label: 'Filter By Status',
            //     noFilterOption: true,
            //     noFilterOptionLabel: 'All Status'
            // )

            
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
            
            ->paginate(10)
            ->export();

            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            
    }
}
