// app/Controllers/Reports.php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BookModel;
use App\Models\FeedbackModel; // Add FeedbackModel

class Reports extends Controller
{
    public function index()
    {
        $bookModel = new BookModel();
        $data['reports'] = $bookModel->findAll(); // Fetch books

        $feedbackModel = new FeedbackModel();
        $data['feedback'] = $feedbackModel->findAll(); // Fetch feedback

        echo view('reports_view', $data);
    }

    public function submitFeedback()
    {
        // Validate form data
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required',
            'book' => 'required',
            'rating' => 'required|in_list[1,2,3,4,5]',
            'feedback' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Validation failed, handle errors
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Insert feedback into database
        $feedbackModel = new FeedbackModel();
        $feedbackData = [
            'name' => $this->request->getPost('name'),
            'book' => $this->request->getPost('book'),
            'rating' => $this->request->getPost('rating'),
            'feedback' => $this->request->getPost('feedback'),
            'created_at' => date('Y-m-d H:i:s'),
        ];
        
        $feedbackModel->insert($feedbackData);

        // Redirect back to index page with success message
        return redirect()->to(site_url('reports'))->with('success', 'Feedback submitted successfully!');
    }
}
