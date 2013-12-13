<?php

namespace Wdr\StroibatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Etapi
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Etapi
{

	const SERVER_PATH_TO_IMAGE_FOLDER = '/uploads/images';

	/**
	 * Unmapped property to handle file uploads
	 */
	private $file;

	/**
	 * Sets file.
	 *
	 * @param UploadedFile $file
	 */
	public function setFile(UploadedFile $file = null)
	{
		$this->file = $file;
	}

	/**
	 * Get file.
	 *
	 * @return UploadedFile
	 */
	public function getFile()
	{
		return $this->file;
	}

	/**
	 * Manages the copying of the file to the relevant place on the server
	 */
	public function upload()
	{
		// the file property can be empty if the field is not required
		if (null === $this->getFile()) {
			return;
		}

		// we use the original file name here but you should
		// sanitize it at least to avoid any security issues

		// move takes the target directory and target filename as params
		$this->getFile()->move(
			Image::SERVER_PATH_TO_IMAGE_FOLDER,
			$this->getFile()->getClientOriginalName()
		);

		// set the path property to the filename where you've saved the file
		var_dump($this->getFile()->getClientOriginalName());die;
		$this->path = $this->getFile()->getClientOriginalName();

		// clean up the file property as you won't need it anymore
		$this->setFile(null);
	}

	/**
	 * Lifecycle callback to upload the file to the server
	 */
	public function lifecycleFileUpload() {
		$this->upload();
	}

	/**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

	/**
	 * @ORM\Column(type="string", length=255)
	 * @Assert\NotBlank
	 */
	public $title;

	/**
	 * @ORM\Column(type="text")
	 */
	protected $description;

	/**
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	public $path;

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
     * Set title
     *
     * @param string $title
     * @return Etapi
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Etapi
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Etapi
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }
}