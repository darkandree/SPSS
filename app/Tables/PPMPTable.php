<?php

namespace App\Tables;

use App\Models\PPMPView;

use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

use Illuminate\Support\Facades\Auth;

use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Collection;

class PPMPTable extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct($tempProgId,$tempCyId)
    {
        //
       // 'ppmp' => [PPMPTable::class,$tempProgId,$tempCyId],

        $this->tempProgId = $tempProgId;
        $this->tempCyId = $tempCyId;
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
                        ->orWhere('CALENDAR_YEAR1', 'LIKE', "%{$value}%")
                        ->orWhere('TOTAL_ALLOCATION', 'LIKE', "%{$value}%")
                        ->orWhere('DATE_ENCODED', 'LIKE', "%{$value}%");
                });
            });
        });


        //return QueryBuilder::for(GeorefAccomplishmentGpxView::WHERE('upload_id',$this->upload_id))
        
        return QueryBuilder::for(PPMPView::where('CALENDAR_YEAR1',$this->tempCyId))
        ->where('PROGRAMS_ID',$this->tempProgId)
        ->where('USER_ID',Auth::User()->user_id)
        ->orderByDesc('id')
        ->allowedSorts('id' ,'TOTAL_ALLOCATION','CALENDAR_YEAR1','DATE_ENCODED')
        ->allowedFilters(['id','TOTAL_ALLOCATION','CALENDAR_YEAR1','DATE_ENCODED',$globalSearch]);
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
            ->column('id','PPMP ID', sortable: true,searchable:true)
            ->column('actions')
            ->column('status')
            ->column('status', hidden: false)
            ->column('TOTAL_ALLOCATION', 'Allocation', sortable: true, hidden: false, searchable: true, as: function ($value) {
                return number_format((float) $value, 2, '.', ',');
            })
            ->column('DATE_ENCODED','Date', sortable: true, hidden:false,searchable:true)
            ->export()
            ->paginate(10);
    }
}
