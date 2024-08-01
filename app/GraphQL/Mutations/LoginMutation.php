<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Auth;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;

class LoginMutation extends Mutation
{
    protected $attributes = [
        'name' => 'login',
    ];

    public function type(): Type
    {
        return GraphQL::type('AuthPayload');
    }

    public function args(): array
    {
        return [
            'email' => [
                'name' => 'email',
                'type' => Type::nonNull(Type::string()),
            ],
            'password' => [
                'name' => 'password',
                'type' => Type::nonNull(Type::string()),
            ],
        ];
    }

    public function resolve($root, $args)
    {
        if (!Auth::attempt(['email' => $args['email'], 'password' => $args['password']])) {
            return null;
        }

        $user = Auth::user();
        $token = $user->createToken('authToken')->plainTextToken;

        return [
            'token' => $token,
            'user' => $user,
        ];
    }
}
