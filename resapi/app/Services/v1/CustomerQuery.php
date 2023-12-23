<?php 

namespace App\Services\v1;

use Illuminate\Http\Request;

class CustomerQuery{
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

    public function transform(Request $request){
        $eloQuery = [];

        foreach($this->safeParms as $parm => $operators){
            $query = $request->query($parm);

            if(!isset($query)){
                continue;
            }

            $column = $this->columnMap[$parm] ?? $parm;

            foreach($operators as $operator){
                if(isset($query[$operator])){
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }

        return $eloQuery;
    }
}