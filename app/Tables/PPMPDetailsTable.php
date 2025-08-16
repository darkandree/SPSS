<?php

namespace App\Tables;

use App\Models\PPMPDetailsView;

use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

use Illuminate\Support\Facades\Auth;

use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Collection;

class PPMPDetailsTable extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct($tempPPMPId)
    {
        //
       // 'ppmp' => [PPMPTable::class,$tempProgId,$tempCyId],

        $this->tempPPMPId = $tempPPMPId;
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
                        ->orWhere('CATEGORY', 'LIKE', "%{$value}%")
                        ->orWhere('SUBCATEGORY', 'LIKE', "%{$value}%")
                        ->orWhere('STOCKS', 'LIKE', "%{$value}%")
                        ->orWhere('UNIT_PRICE', 'LIKE', "%{$value}%")
                        ->orWhere('UOM', 'LIKE', "%{$value}%");
                });
            });
        });


        //return QueryBuilder::for(GeorefAccomplishmentGpxView::WHERE('upload_id',$this->upload_id))
        
        return QueryBuilder::for(PPMPDetailsView::WHERE('PPMP_ID',$this->tempPPMPId))
        ->orderByDesc('id')
        ->allowedSorts('id' ,'CATEGORY','SUBCATEGORY','STOCKS','UNIT_PRICE','UOM')
        ->allowedFilters(['id' ,'CATEGORY','SUBCATEGORY','STOCKS','UNIT_PRICE','UOM',$globalSearch]);
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
            ->column('id','PPMP DETAILS ID', sortable: true,searchable:true)
            ->column('actions')
            ->column('status')
            ->column('CATEGORY','CATEGORY', sortable: true,searchable:true)
            ->column('SUBCATEGORY','SUBCATEGORY', sortable: true,searchable:true)
            ->column('STOCKS','STOCKS', sortable: true,searchable:true)
            ->column('UNIT_PRICE', 'UNIT PRICE', sortable: true, hidden: false, searchable: true, as: function ($value) {
                return number_format((float) $value, 2, '.', ',');
            })
            ->column('UOM', sortable: true, hidden:false,searchable:true)
            ->export()
            ->paginate(10);
    }
}
