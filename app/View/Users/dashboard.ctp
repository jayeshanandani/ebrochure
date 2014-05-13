<?php echo $this->element('navigation'); ?>
<br><br>
<p>
<?php
echo "Welcome ".AuthComponent::user('firstname')." ".AuthComponent::user('lastname');
?>
</p>
<p>
<?php
echo  "Your last login was at ".$this->Time->nice(AuthComponent::user('modified'));
?>
</p>
<br><br>
<h2> Brochure Publisher </h2><br><br>
<p>
With the amount of events being held in an educational institute these days, there is an exponential increase in the use of paper brochures and flyers for advertisements andnotifications regarding various events. Each institute wants to promote their event to a large mass resulting in a large amount of paper printing. The disadvantage with paperbrochures and flyers are that, after the events are over they eventually land up crumbled in the dustbin. Internet is widely used by the masses for a variety of purposes, sonotifying them about an upcoming event in a institute via the internet would only be a better alternative when compared to its "paper" counterpart. The added advantage with E-Brochures and E-Flyers are that they can be reused and customized according to the institute's demands.
</p>