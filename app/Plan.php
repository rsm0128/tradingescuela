<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table 	= 'plans';
    protected $guarded 	= ['id'];

    public function pages()
    {
        return $this->belongsToMany('App\Page');
    }

    public function has($field = null)
    {
    	if (is_array($field))
    		$pages = $this->pages()->whereIn('name', $field)->where('active', 1)->get();
    	else
    		$pages = $this->pages()->where('name', $field)->where('active', 1)->get();
    	if ($pages->isNotEmpty())
    		return true;
    	else
    		return false;
    }

    public static function get($params = [])
    {
        $active         = isset($params['status'])          ? $params['status']         : 1;
        $hasPromo      	= isset($params['has_promo'])      	? $params['has_promo']     	: false;
        $onlyPromo      = isset($params['only_promo'])      ? $params['only_promo']     : null;
        $validExpiration = isset($params['valid_expiration']) ? $params['valid_expiration'] : false;
        $orderBy        = isset($params['order_by'])        ? $params['order_by']       : ['column' => 'id', 'direction' => 'asc'];
        $pages         	= isset($params['pages'])           ? $params['pages']          : [];

        $plans = Plan::select(
                'plans.*',
                'pages.id AS pages_id',
                'pages.name AS pages_name'
            )
            ->leftJoin('page_plan', 'page_plan.plan_id', '=', 'plans.id')
            ->leftJoin('pages', 'pages.id', '=', 'page_plan.page_id');

        if (!empty($pages))
            $plans->whereIn('pages.name', $pages);

        if (!is_null($active))
            $plans->where('plans.status', $active);

        if (!is_null($onlyPromo)) {
            if ($onlyPromo == 1) {
                if (!empty($validExpiration))
                    $plans->where('has_promo', 1)->where('promo_duration', '>', date('Y-m-d H:i:s'))->groupBy('plans.id');
                else
                    $plans->where('has_promo', 1)->groupBy('plans.id');
            } else {
                $plans->where('has_promo', 0)->groupBy('plans.id');
            }
            
        }

        if (!empty($hasPromo)) {
            $plans->whereRaw(
                '(
                    (plans.has_promo = 1 AND plans.promo_duration > "'.date('Y-m-d H:i:s').'") OR plans.has_promo = 0
                )'
            );
        }

        if (!is_null($orderBy))
            $plans->orderBy($orderBy['column'], $orderBy['direction']);
        //var_dump($plans->toSql(), $plans->getBindings()); exit;
        return $plans->get();
    }
}
