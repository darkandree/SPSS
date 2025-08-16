<?php

namespace App\Tables;

use App\Models\lbpview;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Collection;

class tablelbp extends AbstractTable
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
                        ->orWhere('municipality', 'LIKE', "%{$value}%")
                        ->orWhere('barangay', 'LIKE', "%{$value}%")
                        ->orWhere('fullname', 'LIKE', "%{$value}%");
//                      ->orWhere('personnelname', 'LIKE', "%{$value}%");
                });
            });
        });
 
//dd(Division::class);
//dd(QueryModel::QueryInventory());
        return QueryBuilder::for(lbpview::class)
        ->allowedSorts('id' ,'municipality','barangay','fullname')
        ->allowedFilters(['id' ,'municipality','barangay','fullname',$globalSearch]);
    
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
            ->column('municipality', sortable: true,hidden:true,searchable:true)
            ->column('barangay', sortable: true, hidden:true,searchable:true)
            ->column('action')
            ->column('fullname', sortable: true)
            ->column('bday')
            ->column('rsbsa_number', sortable: true,searchable:true)
            ->paginate();

            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}
