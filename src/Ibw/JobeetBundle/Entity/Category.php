<?php

namespace Ibw\JobeetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ibw\JobeetBundle\Utils\Jobeet as Jobeet;

/**
 * Category
 */
class Category

{


    private $more_jobs;




    /**
     * @var boolean
     * */
    private $active_jobs;



    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $jobs;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $affiliates;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->jobs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->affiliates = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * @param mixed $more_jobs
     */
    public function setMoreJobs($more_jobs)
    {
        $this->more_jobs = $more_jobs >=  0 ? $more_jobs : 0;
    }

    /**
     * @return mixed
     */
    public function getMoreJobs()
    {
        return $this->more_jobs;
    }




    /**
     * @param mixed $active_jobs
     */
    public function setActiveJobs($active_jobs)
    {
        $this->active_jobs = $active_jobs;
    }

    /**
     * @return mixed
     */
    public function getActiveJobs()
    {
        return $this->active_jobs;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add jobs
     *
     * @param \Ibw\JobeetBundle\Entity\Job $jobs
     * @return Category
     */
    public function addJob(\Ibw\JobeetBundle\Entity\Job $jobs)
    {
        $this->jobs[] = $jobs;

        return $this;
    }

    /**
     * Remove jobs
     *
     * @param \Ibw\JobeetBundle\Entity\Job $jobs
     */
    public function removeJob(\Ibw\JobeetBundle\Entity\Job $jobs)
    {
        $this->jobs->removeElement($jobs);
    }

    /**
     * Get jobs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getJobs()
    {
        return $this->jobs;
    }

    /**
     * Add affiliates
     *
     * @param \Ibw\JobeetBundle\Entity\Affiliate $affiliates
     * @return Category
     */
    public function addAffiliate(\Ibw\JobeetBundle\Entity\Affiliate $affiliates)
    {
        $this->affiliates[] = $affiliates;

        return $this;
    }

    /**
     * Remove affiliates
     *
     * @param \Ibw\JobeetBundle\Entity\Affiliate $affiliates
     */
    public function removeAffiliate(\Ibw\JobeetBundle\Entity\Affiliate $affiliates)
    {
        $this->affiliates->removeElement($affiliates);
    }

    /**
     * Get affiliates
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAffiliates()
    {
        return $this->affiliates;
    }

    public function __toString(){
        return $this->getName()? $this->getName():'';
    }



    /**
     * @var string
     */
    private $slug;


    /**
     * Set slug
     *
     * @param string $slug
     * @return Category
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
    /**
     * @ORM\PrePersist
     */
    public function setSlugValue()
    {
        $this->slug = Jobeet::slugify($this->getName());
    }
}
