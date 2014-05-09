<?php

namespace Cox\Storage\Batch;

interface BatchRepositoryInterface {

	public function all();

	public function find($id);

	public function findByOrder($order_id);

	public function findByToday();

	public function store($input);

	public function update($id, $input);

	public function destroy($id);

}