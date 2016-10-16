<?php

/**
 * This class provides Security exception handling functionality.
 */

namespace Maleficarum\Api\Handler\Exception;

class Security
{
    /**
     * Use \Maleficarum\Response\Http\Dependant functionality.
     *
     * @trait
     */
    use \Maleficarum\Response\Dependant;

    /**
     * NotFound exception handling functionality.
     *
     * @param \Exception $e
     * @param int $debugLevel
     *
     * @throws \InvalidArgumentException
     */
    public function handle(\Exception $e, $debugLevel)
    {
        if (!is_int($debugLevel)) throw new \InvalidArgumentException('Incorrect debug level - integer expected. \Maleficarum\Api\Handler\Exception\Security::handle()');

        // set response status
        $this->getResponse()->setStatusCode(\Maleficarum\Response\Status::STATUS_CODE_403);

        // handle response
        $this->handleJSON($e, $debugLevel);
    }

    /**
     * Perform error handling in API mode.
     *
     * @param \Exception $e
     * @param int $debugLevel
     */
    private function handleJSON(\Exception $e, $debugLevel)
    {
        if ($debugLevel >= \Maleficarum\Api\Handler\AbstractHandler::DEBUG_LEVEL_LIMITED) {
            $this->getResponse()->render(
                [],
                ['msg' => $e->getMessage()],
                false
            )->output();
        } else {
            $this->getResponse()->render(
                [],
                ['msg' => '403 Unauthorized'],
                false
            )->output();
        }

        exit;
    }
}
