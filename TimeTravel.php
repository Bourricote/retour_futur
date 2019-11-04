<?php


class TimeTravel
{
    /**
     * @var object
     */
    private $start;

    /**
     * @var object
     */
    private $end;

    public function __construct(DateTimeImmutable $start, DateTime $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @return string
     */
    public function getTravelInfo()
    {
        $diff = $this->start->diff($this->end);
        return 'Il y a ' . $diff->y . ' années,' . $diff->m . ' mois,' . $diff->d . ' jours, ' . $diff->h . ' heures ' . $diff->i . ' minutes et ' . $diff->s . ' secondes entre les deux dates. </br>';
    }

    /**
     * @param DateInterval $interval
     * @return DateInterval|DateTime|object
     */
    public function findDate(DateInterval $interval)
    {
        $this->end = $this->getStart()->sub($interval);
        return $this->end;
    }


    /**
     * @param DatePeriod $step
     * @return array
     */
    public function backToFutureStepByStep(DatePeriod $step)
    {
        $steps = [];
        foreach ($step as $date) {
            $steps[] = $date->format('M d Y A h:i');
        }
        return $steps;
    }


    /**
     * @return mixed
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param mixed $start
     */
    public function setStart(DateTime $start): void
    {
        $this->start = $start;
    }

    /**
     * @return mixed
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param mixed $end
     */
    public function setEnd(DateTime $end): void
    {
        $this->end = $end;
    }
}