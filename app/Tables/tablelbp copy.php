<?php

namespace App\Tables;

use App\Models\lbp;
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
                        ->orWhere('rsbsa_number', 'LIKE', "%{$value}%")
                        ->orWhere('lastname', 'LIKE', "%{$value}%")
                        ->orWhere('firstname', 'LIKE', "%{$value}%")
                        ->orWhere('middlename', 'LIKE', "%{$value}%")
                        ->orWhere('suffixname', 'LIKE', "%{$value}%")
                        ->orWhere('province', 'LIKE', "%{$value}%")
                        ->orWhere('municipality', 'LIKE', "%{$value}%")
                        ->orWhere('barangay', 'LIKE', "%{$value}%");
//                      ->orWhere('personnelname', 'LIKE', "%{$value}%");
                });
            });
        });
 
//dd(Division::class);
//dd(QueryModel::QueryInventory());
        return QueryBuilder::for(lbp::class)
        ->allowedSorts('id' ,'rsbsa_number','lastname','firstname','middlename','suffixname','province','municipality','barangay')
        ->allowedFilters(['id' ,'rsbsa_number','lastname','firstname','middlename','suffixname','province','municipality','barangay',$globalSearch]);
    
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
            ->column('action', sortable: true)
            ->column('rsbsa_number', sortable: true,searchable:true)
            ->column('lastname', sortable: true,searchable:true)
            ->column('firstname', sortable: true,searchable:true)
            ->column('middlename', sortable: true,searchable:true)
            ->column('suffixname', sortable: true,searchable:true)
            ->column('province', sortable: true,searchable:true)
            ->column('municipality', sortable: true,searchable:true)
            ->column('barangay', sortable: true,searchable:true)
            ->paginate(5);

            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}
