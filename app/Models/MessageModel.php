<?php
namespace App\Models;

use CodeIgniter\Model;

class MessageModel extends Model
{
    protected $table = "messages";
    protected $allowedFields = ["msgFrom","msgTo","msg"];
    protected $useTimestamps = true;
    protected $returnType    = \App\Entities\Message::class;

    protected $validationRules = [];
    protected $validationMessages = [];
}