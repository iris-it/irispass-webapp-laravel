<?php namespace App\Repositories\Eloquent;

use App\Organization;
use App\Repositories\OrganizationRepositoryInterface;
use App\User;

class OrganizationRepository implements OrganizationRepositoryInterface
{
    /**
     * @var Event
     */
    private $model;

    private $user;

    /**
     * @param Organization $organization
     * @param User $user
     * @param HashidsManager $hashids
     * @internal param OsjsGroup $group
     */
    public function __construct(Organization $organization, User $user)
    {
        $this->model = $organization;
        $this->user = $user;
    }


    /**
     * get all organizations
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * get all organizations in a list for a select box
     * @return mixed
     */
    public function getList()
    {
        return $this->model->latest('created_at')->lists('name', 'id');
    }

    /**
     * get organization by id
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * create a new organization
     * @param array $data
     * @return static
     */
    public function create(Array $data)
    {
        $data['uuid'] = uniqid();
        return $this->model->create($data);
    }

    /**
     * update an organization
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, Array $data)
    {
        $user = $this->model->findOrFail($id)->update($data);

        return $user;
    }

    /**
     * delete a organization
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->findOrFail($id)->delete();
    }

    /**
     * get all organizations in paginated list
     * @param $number
     * @return mixed
     */
    public function paginate($number)
    {
        return $this->model->latest('created_at')->paginate($number);
    }
}
