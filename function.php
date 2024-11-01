<?php
function getSalary($numberOfHours){
        return $numberOfHours * 200.00;
    }

    function getDeduction($loan) {
        return ($loan * 0.1) + ($loan / 12);
    }

    function getNet($numberOfHours, $loan) {
        return getSalary($numberOfHours) - getDeduction($loan);
    }
?>

