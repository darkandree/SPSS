<?php

namespace App\Tables;


use App\Models\RffaValidationView;
use App\Models\RffaValidation;

use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Collection;

use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\FormBuilder\Input;

class RffaTable extends AbstractTable
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
                        ->orWhere('rsbsa_no', 'LIKE', "%{$value}%")
                        ->orWhere('agri_verify', 'LIKE', "%{$value}%")
                        ->orWhere('rsbsa_verify', 'LIKE', "%{$value}%");
                });
            });
        });
 
        return QueryBuilder::for(RffaValidation::class)
        ->allowedSorts('rsbsa_no','province','municipality','barangay','first_name','middle_name','last_name','ext_name')
        ->allowedFilters(['rsbsa_no','province','municipality','barangay','first_name','middle_name','last_name','ext_name', $globalSearch]);
    
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
            ->column('id', sortable: true,searchable:true, hidden:true)
            ->column('AgriVerify')
            ->column('RsbsaVerify')
            ->column('rsbsa_no', sortable: false,searchable:true, hidden:false)
            //Fullname
            ->column('first_name', sortable: true,searchable:true, hidden:false)
            ->column('middle_name', sortable: true,searchable:true, hidden:false)
            ->column('last_name', sortable: true,searchable:true, hidden:false)
            ->column('ext_name', sortable: true,searchable:true, hidden:false)
            //Address
            ->column('province', sortable: true,searchable:true, hidden:false)
            ->column('municipality', sortable: true,searchable:true, hidden:false)
            ->column('barangay', sortable: true,searchable:true, hidden:false)
            ->column('remarks', sortable: true,hidden:true,searchable:false)

            
            ->paginate(10)
            ->export();

            
    }
}
