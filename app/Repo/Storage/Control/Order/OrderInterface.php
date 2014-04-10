<?php

namespace Repo\Storage\Control\Order;

interface OrderInterface {
	public function all();

	public function find($id);
	public function paginate();
	public function create($data);
	public function update($id);
	public function destroy($id);

	public function instance();
}