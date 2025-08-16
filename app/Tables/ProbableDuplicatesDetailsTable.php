<?php

namespace App\Tables;

use App\Models\EncoderAccomplishment;

use App\Models\ProbableDuplicatesDetailsView;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;



use Illuminate\Support\Facades\Auth;

use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\Facades\Toast;

class ProbableDuplicatesDetailsTable extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * 
     */

    protected $fullname;

    public function __construct($fullname)
    {
        //

        $this->fullname = $fullname;
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
                        ->orWhere('rsbsa_no', 'LIKE', "%{$value}%")
                        ->orWhere('fullname', 'LIKE', "%{$value}%")
                        ->orWhere('birthday', 'LIKE', "%{$value}%")
                        ->orWhere('gender', 'LIKE', "%{$value}%")
                        ->orWhere('address', 'LIKE', "%{$value}%");
                });
            });
        });
 
//dd(Division::class);
//dd(QueryModel::QueryInventory());
        return QueryBuilder::for(ProbableDuplicatesDetailsView::WHERE('fullname',$this->fullname))
        ->allowedSorts('id','rsbsa_no' ,'fullname','birthday','gender','address')
        ->allowedFilters(['id','rsbsa_no' ,'fullname','birthday','gender','address',$globalSearch]);
    
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
            ->column('rsbsa_no', sortable: true,hidden:false,searchable:true)
            ->column('fullname', sortable: true,hidden:false,searchable:true)
            ->column('birthday', sortable: true, hidden:false,searchable:true)
            ->column('gender', sortable: true, hidden:false,searchable:true)
            ->column('address', sortable: true, hidden:false,searchable:true)
            ->column('birthday', sortable: true, hidden:false,searchable:true)
           
            ->export()
            ->paginate(10);

            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->bulkAction()
            // ->export()
    }
}
