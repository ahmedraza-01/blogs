<?php
namespace App\Http\Controllers;

use App\Services\MediumService;
use Illuminate\Http\Request;

class MediumController extends Controller
{
    protected $mediumService;

    public function __construct(MediumService $mediumService)
    {
        $this->mediumService = $mediumService;
    }

    public function index()
    {
        // Fetch publications
        $publications = $this->mediumService->getPublications();

        // Assuming you want the first publication's posts
        $publicationId = $publications['data'][0]['id']; // Replace with actual logic if needed
        $posts = $this->mediumService->getPosts($publicationId);

        return view('medium.index', ['posts' => $posts['data']]);
    }
}
