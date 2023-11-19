<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

final class Handler extends ExceptionHandler
{
	/**
	 * A list of the exception types that are not reported.
	 *
	 * @var array<int, class-string<Throwable>>
	 */
	protected $dontReport = [];

	/**
	 * A list of the inputs that are never flashed for validation exceptions.
	 *
	 * @var array<int, string>
	 */
	protected $dontFlash = ['current_password', 'password', 'password_confirmation'];

	/**
	 * Register the exception handling callbacks for the application.
	 */
	public function register(): void
	{
		$this->reportable(function (Throwable $e): void {
		});
	}

	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param Exception $exception
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function render($request, Throwable $exception)
	{
		if ($request->wantsJson()) {
			$response = [
				'status' => $this->prepareJsonResponse($request, $exception)->getStatusCode(),
				'message' => $exception->getMessage(),
				'data' => \get_class($exception),
			];

			return response()->json($response, $response['status']);
		}

		return parent::render($request, $exception);
	}
}
