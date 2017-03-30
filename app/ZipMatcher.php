<?php

namespace App;

class ZipMatcher
{
    /**
     * The first agent ZIP.
     *
     * @var int
     */
    protected $agent_one_zip;

    /**
     * The second agent ZIP.
     *
     * @var int
     */
    protected $agent_two_zip;

    public function __construct ($zip_one, $zip_two)
    {
        $this->agent_one_zip = $zip_one;
        $this->agent_two_zip = $zip_two;
    }

    /**
     * Match current ZIPs with the contact list.
     *
     * @return array
     */
    public function match ()
    {
        $result = array();
        $result[$this->agent_one_zip] = array();
        $result[$this->agent_two_zip] = array();
        foreach (Contact::all() as $contact) {
            $distance_to_one = $this->getDistance($this->agent_one_zip, $contact->zip);
            if (is_null($distance_to_one)) {
                // If ZIPs are not right, avoid a new query to google
                continue;
            }
            $distance_to_two = $this->getDistance($this->agent_two_zip, $contact->zip);
            if ($distance_to_one <= $distance_to_two) {
                $result[$this->agent_one_zip][] = $contact;
            } else {
                $result[$this->agent_two_zip][] = $contact;
            }
        }

        return $result;
    }

    /**
     * Query google API to retrieve the distance between two ZIPs.
     *
     * @param int   $zip_one    First ZIP
     * @param int   $zip_two    Second ZIP
     *
     * @return int
     */
    private function getDistance ($zip_one, $zip_two)
    {
        $json = \GoogleMaps::load('distancematrix')
            ->setParamByKey ('origins', $zip_one)
            ->setParamByKey ('destinations', $zip_two)
            ->get();
        $response = json_decode($json);
        if (isset($response->rows[0]->elements[0]->distance->value)) {
            return $response->rows[0]->elements[0]->distance->value;
        } else {
            return null;
        }
    }

}
