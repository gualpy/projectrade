<?php

namespace App\Filters;

use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Auth implements FilterInterface
{
	/**
	 * Do whatever processing this filter needs to do.
	 * By default it should not return anything during
	 * normal execution. However, when an abnormal state
	 * is found, it should return an instance of
	 * CodeIgniter\HTTP\Response. If it does, script
	 * execution will end and that Response will be
	 * sent back to the client, allowing for error pages,
	 * redirects, etc.
	 *
	 * @param RequestInterface $request
	 * @param array|null       $arguments
	 *
	 * @return mixed
	 */
	public function before(RequestInterface $request, $arguments = null)
	{
		
		//Si la sessión NO está activa se redirecciona a la pág. principal
		if(!session()->is_logged){
			return redirect()->route('/')->with('msg',[
				'type'=>'warning',
				'body'=>'You must log in'
			]);
		}
		//dd(session());
		$model=model('Cliente');
		if(!$cliente=$model->getClientBy('cliente',session()->id_cliente)){
			session()->destroy();
			return redirect()->route('/')->with('msg',[
				'type'=>'warning',
				'body'=>'You must log in'
			]);
		}
		
		if (!in_array($cliente->getRole()->nombreGrupo, $arguments)) {
			throw PageNotFoundException::forPageNotFound();
		}
	}

	/**
	 * Allows After filters to inspect and modify the response
	 * object as needed. This method does not allow any way
	 * to stop execution of other after filters, short of
	 * throwing an Exception or Error.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param array|null        $arguments
	 *
	 * @return mixed
	 */
	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		//
	}
}
