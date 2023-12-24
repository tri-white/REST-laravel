<?php 

namespace App\Filters\v1;
use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class InvoicesFilter extends ApiFilter{
    protected $safeParms = [
        'customerId' => ['eq'],
        'amount' =>  ['eq','gt','lt'],
        'status' => ['eq', 'ne'],
        'billedDate' => ['eq'],
        'paidDate' => ['eq'],
    ];

    protected $columnMap = [
        'customerId' => 'customer_id',
        'billedDate'=>'billed_date',
        'paidDate'=>'paid_date',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>',
        'ne' => '!=',
    ];
}