<?php
namespace Modules\Employee\App\Repositories;

use App\Models\Employee;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function create(array $data)
    {
        $salary = $data['monthly_salary_package'];
        $designation = $data['designation'];

        // Calculate Tax
        $tax = 0;
        if ($salary >= 150000) { $tax = $salary * 0.05; }
        elseif ($salary >= 100000) { $tax = $salary * 0.03; }

        // Calculate Bonus
        $bonus = 0;
        switch ($designation) {
            case 'Manager': $bonus = $salary * 0.05; break;
            case 'Senior': $bonus = $salary * 0.03; break;
            case 'Associate': $bonus = $salary * 0.01; break;
        }

        // Calculate Net Salary
        $netSalary = $salary - $tax;

        return Employee::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'designation' => $designation,
            'monthly_salary_package' => $salary,
            'monthly_tax_value' => $tax,
            'yearly_increasing_bonus' => $bonus,
            'monthly_net_salary' => $netSalary,
        ]);
    }
}
