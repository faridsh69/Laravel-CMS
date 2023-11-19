<?php

declare(strict_types=1);

namespace App\Cms\Traits;

trait ApiTrait
{
	private $data;

	private string $message = 'Not Found';

	private string $status = 'error';

	public function setData($data): self
	{
		$this->data = $data;

		return $this;
	}

	public function setMessage(string $message): self
	{
		$this->message = $message;

		return $this;
	}

	private function setErrorStatus(): self
	{
		$this->status = 'error';

		return $this;
	}

	private function setSuccessStatus(): self
	{
		$this->status = 'success';

		return $this;
	}

	private function prepareJsonResponse()
	{
		return response()->json(
			[
				'status' => $this->status,
				'message' => $this->message,
				'data' => $this->data,
			],
			$this->status === 'success' ? 200 : 500
		);
	}
}
