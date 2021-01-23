<?php   

namespace App\Repositories;   

use App\Interfaces\IBaseRepositoryInterface; 
use Illuminate\Database\Eloquent\Model;   
use Illuminate\Support\Facades\DB;

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

    public function selectJoin($currentTable, $currentPrimaryKey, $joinTable, $joinPrimaryKey,$column){
        return DB::table($joinTable) 
        ->leftJoin($currentTable, $currentTable.'.'.$currentPrimaryKey, '=', $joinTable.'.'.$joinPrimaryKey)
        ->select($currentTable.'.'.$column,$joinTable.'.*')->paginate(5);
    }
    public function selectJoinWhere($currentTable, $currentPrimaryKey, $joinTable, $joinPrimaryKey,$parameter,$value){
        return DB::table($joinTable) 
        ->rightJoin($currentTable, $currentTable.'.'.$currentPrimaryKey, '=', $joinTable.'.'.$joinPrimaryKey)
        ->select($currentTable.'.*',$joinTable.'.*')
        ->where($joinTable.'.'.$parameter,'=',$value)
        ->get();
    }
    /*
    return DB::table('tasks')
    ->leftjoin('services', 'tasks.service_task', '=', 'services.id_service')
    ->select('tasks.*', 'services.name_service', 'services.price_service', 'clients.cpf_client' ,  'clients.email_client', 'clients.name_client')
    ->orderBy('created_at')
    ->simplePaginate(4);
   }
   */


}