<?php

namespace App\View\Components\Job;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class SingleJob extends Component
{

    /**
     * Job ID
     *
     * @var integer
     */
    public $id;


    public $job;

    /**
     * Job Title
     *
     * @var string
     */
    public $title;

    /**
     * Job Description
     *
     * @var string
     */
    public $description;

    /**
     * Job Analysis Status
     *
     * @var string
     */
    public $status;

    /**
     * Job URL
     *
     * @var string
     */
    public $url;

    /**
     * Job Applied By
     *
     * @var string
     */
    public $applied_by;

    /**
     * Job Applied By
     *
     * @var string
     */
    public $job_type;

    /**
     * Job Qualification Date
     *
     * @var 'Date String'
     */
    public $qualified_date;
    public $upwork_created_date;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($job)
    {
        $this->id = $job->id;
        $this->job = $job;
        $this->title = Str::limit($job->title, 55);
        $this->description = Str::limit($job->description, 40);
        $this->status = $job->status;
        $this->url = $job->link();
        $this->applied_by = $job->applied_by;
        $this->job_type = Str::of($job->job_type)->ucfirst();
        $this->qualified_date = $job->qualified_date;
        $this->upwork_created_date = $job->upwork_created_date;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.job.single-job');
    }
}
