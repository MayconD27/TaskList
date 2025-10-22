<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="TaskList API",
 *     version="1.0.0",
 *     description="API para gerenciamento de tarefas",
 *     @OA\Contact(
 *         email="suporte@tasklist.com",
 *         name="Equipe TaskList"
 *     )
 * )
 *
 * @OA\Server(
 *     url="http://localhost:8000",
 *     description="Servidor local"
 * )
 */
class SwaggerAnnotations
{
    // Apenas anotações, não precisa de métodos
}
