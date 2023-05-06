var income, birth_date, children;
result = document.getElementById("result");

input = document.getElementsByClassName("input");
for (let i = 0; i < input.length; i++) {
    input[i].addEventListener('change',  function() {
        income = document.getElementById("income").value;
        birth_date = new Date(document.getElementById("birth_date").value);
        children = document.getElementById("children").value;
        result.innerText = calc_income(income, birth_date, children);
    })
}


function calc_income() {
    if (income == '' || children == '' || birth_date == "Invalid Date")
        return ""

    if (children > 4)
        children = 4;

    age_discount_modifier = 0;
    age = birth_date.getFullYear() - new Date().getFullYear();
    if (age > 0 && (age < 25 || age > 65))
        age_discount_modifier = 1;

    
    if (income < 0 || children < 0) {
        return "Error in input"
    } else if (income < 8000) {
        untaxable = 6000;
        discount_percentage = 0.2;
        tax_percentage = 0.1;
    } else if (income < 15000) {
        untaxable = 6500;
        discount_percentage = 0.1;
        tax_percentage = 0.2;
    } else if (income < 40000) {
        untaxable = 4000;
        discount_percentage = 0.1;
        tax_percentage = 0.32;
    } else {
        untaxable = 2000;
        discount_percentage = 0.05;
        tax_percentage = 0.4;
    }

    taxed_income = income - untaxable;

    tax = taxed_income * tax_percentage;
    discount = age_discount_modifier * discount_percentage + 0.05 * children;
    final_tax = tax - tax * discount;

    // Στον τύπο είναι ΦΕ - Φόρος.Τελ αλλά στο παράδειγμα είναι Εισόδημα - Φόρος.Τελ
    profit = taxed_income - final_tax;
    if (profit < 0)
        profit = 0

    return "Final income: " + profit.toFixed(2);
}