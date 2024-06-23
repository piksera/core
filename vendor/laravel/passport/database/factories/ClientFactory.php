<?php

namespace Laravel\Passport\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Passport\Passport;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Laravel\Passport\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Get the name of the model that is generated by the factory.
     *
     * @return class-string<\Illuminate\Database\Eloquent\Model>
     */
    public function modelName()
    {
        return $this->model ?? Passport::clientModel();
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return $this->ensurePrimaryKeyIsSet([
            'user_id' => null,
            'name' => $this->faker->company(),
            'secret' => Str::random(40),
            'redirect' => $this->faker->url(),
            'personal_access_client' => false,
            'password_client' => false,
            'revoked' => false,
        ]);
    }

    /**
     * Ensure the primary key is set on the model when using UUIDs.
     *
     * @param  array  $data
     * @return array
     */
    protected function ensurePrimaryKeyIsSet(array $data)
    {
        if (Passport::clientUuids()) {
            $keyName = (new ($this->modelName()))->getKeyName();

            $data[$keyName] = (string) Str::orderedUuid();
        }

        return $data;
    }

    /**
     * Use as Password Client.
     *
     * @return $this
     */
    public function asPasswordClient()
    {
        return $this->state([
            'personal_access_client' => false,
            'password_client' => true,
        ]);
    }

    /**
     * Use as Client Credentials.
     *
     * @return $this
     */
    public function asClientCredentials()
    {
        return $this->state([
            'personal_access_client' => false,
            'password_client' => false,
        ]);
    }
}