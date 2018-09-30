<?php
/*
 * Risk matrix calculator
 */
 
class RiskMatrix
{
    function label_color($risk_rating)
    {
        if ($risk_rating >= 11 && $risk_rating <= 25)
        {
            $label_color = 'label-danger';
        } else if($risk_rating >= 4 && $risk_rating <= 10) 
        {
            $label_color = 'label-warning';
        } else if ($risk_rating >= 1 && $risk_rating <= 3) 
        {
            $label_color = 'label-success';
        } else if ($risk_rating == 0) 
        {
            $label_color = 'label-default';
        }
        return $label_color;
    }
}