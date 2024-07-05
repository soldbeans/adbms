// app/Models/FeedbackModel.php

namespace App\Models;

use CodeIgniter\Model;

class FeedbackModel extends Model
{
    protected $table = 'feedback'; // Assuming you create a 'feedback' table
    protected $primaryKey = 'id'; // Adjust primary key as per your table
    protected $allowedFields = ['name', 'book', 'rating', 'feedback', 'created_at']; // Fields that can be inserted

    protected $useTimestamps = true; // Enable automatic timestamps

    // Optionally, define validation rules
    protected $validationRules = [
        'name' => 'required',
        'book' => 'required',
        'rating' => 'required|in_list[1,2,3,4,5]',
        'feedback' => 'required',
    ];

    protected $validationMessages = [
        'rating.in_list' => 'Please select a valid rating.'
    ];
}
