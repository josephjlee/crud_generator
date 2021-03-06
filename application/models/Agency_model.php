<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Agency_model extends CI_Model
{

    public $table = 'agency';
    public $id = 'AgencyID';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('AgencyID,AgencyName,StreetAddress,VillageAddress,SubDistrictAddress,PostalCode,CityAddress,PhoneNumber,FaxNumber,EmailAddress,Status,ActiveDate,EndDate,IsActive,UserType');
        $this->datatables->from('agency');
        //add this line for join
        //$this->datatables->join('table2', 'agency.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('agency/read/$1'),'Read')." | ".anchor(site_url('agency/update/$1'),'Update')." | ".anchor(site_url('agency/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'AgencyID');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('AgencyID', $q);
	$this->db->or_like('AgencyName', $q);
	$this->db->or_like('StreetAddress', $q);
	$this->db->or_like('VillageAddress', $q);
	$this->db->or_like('SubDistrictAddress', $q);
	$this->db->or_like('PostalCode', $q);
	$this->db->or_like('CityAddress', $q);
	$this->db->or_like('PhoneNumber', $q);
	$this->db->or_like('FaxNumber', $q);
	$this->db->or_like('EmailAddress', $q);
	$this->db->or_like('Status', $q);
	$this->db->or_like('ActiveDate', $q);
	$this->db->or_like('EndDate', $q);
	$this->db->or_like('IsActive', $q);
	$this->db->or_like('UserType', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('AgencyID', $q);
	$this->db->or_like('AgencyName', $q);
	$this->db->or_like('StreetAddress', $q);
	$this->db->or_like('VillageAddress', $q);
	$this->db->or_like('SubDistrictAddress', $q);
	$this->db->or_like('PostalCode', $q);
	$this->db->or_like('CityAddress', $q);
	$this->db->or_like('PhoneNumber', $q);
	$this->db->or_like('FaxNumber', $q);
	$this->db->or_like('EmailAddress', $q);
	$this->db->or_like('Status', $q);
	$this->db->or_like('ActiveDate', $q);
	$this->db->or_like('EndDate', $q);
	$this->db->or_like('IsActive', $q);
	$this->db->or_like('UserType', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Agency_model.php */
/* Location: ./application/models/Agency_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-24 13:35:45 */
/* http://harviacode.com */