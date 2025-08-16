<?php

namespace App\Tables;


use App\Models\RSBSAForm;
use App\Models\RSBSAFormStatus;
use App\Models\RSBSAFormView;
use App\Models\CertificateRegistration;
use App\Models\CertificateRegistrationView;

use App\Models\CertificateUpdateRegistration;
use App\Models\CertificateUpdateRegistrationView;

use App\Models\CertificateAppearanceView;

use App\Models\CertificateRegistrationReportCountView;

use App\Models\User;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\FormBuilder\Input;

class UcrTable extends AbstractTable
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
                        ->orWhere('rsbsa_ucr_no', 'LIKE', "%{$value}%")
                        ->orWhere('rsbsa_no', 'LIKE', "%{$value}%");
                });
            });
        });
 
        return QueryBuilder::for(CertificateUpdateRegistrationView::class)
        ->allowedSorts('id' ,'rsbsa_ucr_no','rsbsa_no','fullname','EncodedBy','created_at')
        ->allowedFilters(['id' ,'rsbsa_ucr_no','rsbsa_no','fullname','EncodedBy','created_at',$globalSearch]);

    
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
            ->defaultSortDesc('rsbsa_ucr_no')
            ->column('id', sortable: true,searchable:true)
            ->column('action')
            ->column('rsbsa_ucr_no', sortable: true,hidden:false,searchable:true)
            ->column('rsbsa_no', sortable: true,hidden:false,searchable:true)
            ->column('fullname', sortable: true,hidden:false,searchable:true)
            ->column('EncodedBy', sortable: true,hidden:false,searchable:true)
            ->column('created_at', sortable: true,hidden:false,searchable:true)       
            ->export(
                //label: 'CSV export',
                filename: 'Update RSBSA Registration',
                //type: Excel::CSV
            )
            ->paginate(10);
    }


    protected function showUpdateModal()
    {

       // User $user
       // route('rforms.create');
    }

    protected function updateSelected(array $selectedIds)
    {
        // Logic to update the selected rows with the value from the modal
    }
}
