<?php

namespace App\Http\Controllers\Backend;

use App\Contracts\Repositories\ConfigRepository;
use Illuminate\Http\Request;
use App\Jobs\Config\StoreJob;
use App\Traits\ControllableTrait;

class ConfigController extends BackendController
{
    use ControllableTrait;

    protected $dataSelect = ['key', 'value'];

    public function __construct(ConfigRepository $config)
    {
        parent::__construct($config);
    }

    public function index()
    {
        $this->before(__FUNCTION__);
        parent::__index();
        $this->compacts['items'] = $this->repository->getData($this->dataSelect);
        $this->view = $this->repositoryName . '.create';

        return $this->viewRender();
    }

    public function store(Request $request)
    {
        $this->before('edit');
        $this->validation($request, __FUNCTION__);
        $data = $request->only([
            'name',
            'keywords',
            'description',
            'facebook',
            'youtube',
            'twitter',
            'whatsapp',
            'instagram',
            'email',
            'phone',
            'hotline',
            'fax',
            'slogan',
            'address',
            'copyright',
            'factory',
            'map',
            'popup_title',
            'popup_description',
            'popup_disp_flg',
            'popup_img_flg',
            'popup_img',
            'popup_url',
            'logo',
            'introduce',
            'vchat_hash',
            'adwords_id',
            'adwords_src',
            'vchat_data',
            'analytics_id',
        ]);

        return $this->doRequest(function () use ($data) {
            $this->dispatch(new StoreJob($data));
            \Cache::flush();
        }, 'update');
    }
}
