<?php
/**
 * Created by JetBrains PhpStorm.
 * User: thalley887
 * Date: 09/10/13
 * Time: 11:39
 * To change this template use File | Settings | File Templates.
 */

use \Fototop\Model\Entity\Eloquent\BaseUser;
use \Fototop\Model\Entity\Eloquent\BaseImage;
use \Fototop\Model\Entity\Image;

class ImageRepositoryTest extends TestCase
{
    /**
     * @var \Fototop\Model\Entity\Repository\UserRepository
     */
    private $userRepo;

    /**
     * @var \Fototop\Model\Entity\Repository\ImageRepository
     */
    private $imageRepo;

    /**
     * @var BaseUser
     */
    private $testUser;

    public function setup()
    {
        parent::setUp();
        $this->userRepo = new \Fototop\Model\Entity\Repository\UserRepository();
        $this->imageRepo = new \Fototop\Model\Entity\Repository\ImageRepository();

        # clear all current database users
        DB::table("Image")->delete();
        DB::table("User")->delete();

        $testUser = new BaseUser();
        $testUser->Email = "test@test.com";
        $testUser->Username = "testUser";
        $testUser->Password = "password123";
        $testUser->FacebookID = "gibberish123";
        $testUser->UpdatedAt = date("Y-m-d h:i:s");
        $testUser->CreatedAt = date("Y-m-d h:i:s");
        $testUser->save();

        $this->testUser = $testUser;
    }

    public function tearDown()
    {
        parent::tearDown();
        DB::table("Image")->delete();
        DB::table("User")->delete();
    }

    public function testImageRepository_returnsFalseIfNoId()
    {
        # Act
        $result = $this->imageRepo->findById(99999999);

        # Assert
        $this->assertFalse($result);
    }

    public function testImageRepository_savesNewImage()
    {
        # Arrange
        $testImage = new \Fototop\Model\Entity\Image();
        $testImage->setTitle("Photo #1")
                  ->setChecksum("123456789abcdefgh")
                  ->setDescription("Photo #1 Description")
                  ->setUserID($this->testUser->id);

        # Act
        $result = $this->imageRepo->save($testImage);

        # Assert
        $this->assertTrue($result);
    }

    public function testImageRepository_updatesExistingImage()
    {
        # Arrange
        $testImage = new BaseImage();
        $testImage->Title = "Test Photo #1";
        $testImage->Checksum = "123456789abcdefghi";
        $testImage->Description = "Test Photo #1 Description";
        $testImage->UserID = $this->testUser->id;
        $testImage->UpdatedAt = date("Y-m-d h:i:s");
        $testImage->CreatedAt = date("Y-m-d h:i:s");
        $testImage->save();

        $persistedImage = $this->imageRepo->findById($testImage->id);
        $persistedImage->setDescription("Photo Description Success!");

        # Act
        $result = $this->imageRepo->save($persistedImage);

        /* @var $postUpdateImage BaseImage */
        $postUpdateImage = BaseImage::find($testImage->id);

        # Assert
        $this->assertTrue($result);
        $this->assertEquals("Photo Description Success!", $postUpdateImage->Description);
    }

    public function testImageRepository_failsImageWithInvalidId()
    {
        # Arrange
        $testImage = new BaseImage();
        $testImage->id = 9999999; // insane number
        $testImage->Title = "Test Photo #1";
        $testImage->Checksum = "123456789abcdefghi";
        $testImage->Description = "Test Photo #1 Description";
        $testImage->UserID = $this->testUser->id;
        $testImage->UpdatedAt = date("Y-m-d h:i:s");
        $testImage->CreatedAt = date("Y-m-d h:i:s");

        $testImageModel = new Image($testImage);

        # Act
        $result = $this->imageRepo->save($testImageModel);

        # Assert
        $this->assertNotNull($testImage->id);
        $this->assertFalse($result);
    }

    public function testImageRepository_canGetOneUser()
    {
        # Arrange
        $testImage = new BaseImage();
        $testImage->Title = "Test Photo #1";
        $testImage->Checksum = "123456789abcdefghi";
        $testImage->Description = "Test Photo #1 Description";
        $testImage->UserID = $this->testUser->id;
        $testImage->UpdatedAt = date("Y-m-d h:i:s");
        $testImage->CreatedAt = date("Y-m-d h:i:s");
        $testImage->save();

        # Act
        $image = $this->imageRepo->findById($testImage->id);

        # Assert
        $this->assertEquals($testImage->id, $image->getId());
    }

    public function testImageRepository_canGetTwoUsers()
    {
        # Arrange
        $testImage1 = new BaseImage();
        $testImage1->Title = "Test Photo #1";
        $testImage1->Checksum = "123456789abcdefghi";
        $testImage1->Description = "Test Photo #1 Description";
        $testImage1->UserID = $this->testUser->id;
        $testImage1->UpdatedAt = date("Y-m-d h:i:s");
        $testImage1->CreatedAt = date("Y-m-d h:i:s");
        $testImage1->save();

        $testImage2 = new BaseImage();
        $testImage2->Title = "Test Photo #2";
        $testImage2->Checksum = "abcdefghi123456789";
        $testImage2->Description = "Test Photo #2 Description";
        $testImage2->UserID = $this->testUser->id;
        $testImage2->UpdatedAt = date("Y-m-d h:i:s");
        $testImage2->CreatedAt = date("Y-m-d h:i:s");
        $testImage2->save();

        # Act
        $images = $this->imageRepo->findAll();

        # Assert
        $this->assertTrue(is_array($images));
        $this->assertCount(2, $images);
    }

    public function testImageRepository_findAllReturnsFalseIfNoUsers()
    {
        # Act
        $images = $this->imageRepo->findAll();

        # Assert
        $this->assertCount(0, $images);
    }

    public function testImageRepository_deleteUser()
    {
        # Arrange
        $testImage = new BaseImage();
        $testImage->Title = "Test Photo #1";
        $testImage->Checksum = "123456789abcdefghi";
        $testImage->Description = "Test Photo #1 Description";
        $testImage->UserID = $this->testUser->id;
        $testImage->UpdatedAt = date("Y-m-d h:i:s");
        $testImage->CreatedAt = date("Y-m-d h:i:s");
        $testImage->save();

        $modelImage = new Image($testImage);

        # Act
        $this->imageRepo->delete($modelImage);

        $result = BaseImage::find($modelImage->getId());

        # Assert
        $this->assertNull($result);
    }
}
