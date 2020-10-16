<?php

namespace Spatie\LaravelSettings\SettingsCasts;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use Exception;

class DateTimeInterfaceCast implements SettingsCast
{
    private string $type;

    public function __construct(?string $type)
    {
        $this->type = $type ?? DateTime::class;
    }

    public function get($payload): DateTimeInterface
    {
        if ($this->type === Carbon::class) {
            return new Carbon($payload);
        }

        if ($this->type === CarbonImmutable::class) {
            return new CarbonImmutable($payload);
        }

        if ($this->type === DateTimeImmutable::class) {
            return new DateTimeImmutable($payload);
        }

        if ($this->type === DateTime::class) {
            return new DateTime($payload);
        }

        throw new Exception("Could not cast DateTime type `{$this->type}`");
    }

    /**
     * @param DateTimeInterface $payload
     *
     * @return string
     */
    public function set($payload): string
    {
        return $payload->format(DATE_ATOM);
    }
}
