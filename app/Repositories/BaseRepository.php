<?php   

namespace App\Repositories;   

use App\Interfaces\IBaseRepositoryInterface; 
use Illuminate\Database\Eloquent\Model;   

class BaseRepository implements IBaseRepositoryInterface 
{     
    protected $model;       

    public function __construct(Model $model)     
    {         
        $this->model = $model;
    }
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }
    public function find($id): ?Model
    {
        return $this->model->find($id);
    }
    public function findRegistersExact($attribute, $value, $columns = array('*'))
    {
        return $this->model->where($attribute, '=', $value)->get();
    }
    public function findRegisterSimilar($attribute, $value, $columns = array('*'))
    {
        return $this->model->where($attribute, 'LIKE', $value.'%')->get();
    }
    public function findByOneRegister($attribute, $value, $columns = array('*'))
    {
        return $this->model->where($attribute, '=', $value)->first($columns);
    }
    public function paginate($pags)
    {
        return $this->model->paginate($pags);
    }
    public function delete($id)
    {
        return $this->model->destroy($id);
    }
    public function update(array $data, $id, $attribute = "id")
    {
        return $this->model->where($attribute, '=', $id)->update($data);
    }

}