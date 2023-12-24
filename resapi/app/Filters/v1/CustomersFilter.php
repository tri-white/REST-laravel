<?php 

namespace App\Filters\v1;
use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class CustomersFilter extends ApiFilter{
    protected $safeParms = [
        'postalCode' => ['eq','gt','lt'],
        'name'=> ['eq'],
        'type'=>['eq'],
        'email'=>['eq'],
        'city'=>['eq'],
        'address'=>['eq'],
        'state'=>['eq'],
    ];

    protected $columnMap = [
        'postalCode' => 'postal_code',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>',
    ];
}