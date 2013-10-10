<?php
/**
 * Created by JetBrains PhpStorm.
 * User: thalley887
 * Date: 09/10/13
 * Time: 11:39
 * To change this template use File | Settings | File Templates.
 */

use \Fototop\Model\Entity\Eloquent\BaseUser as OrmUser;
use \Fototop\Model\Entity\User as UserModel;

class UserRepositoryTest extends TestCase
{
    /**
     * @var Fototop\Model\Entity\Repository\UserRepository
     */
    private $userRepo;

    public function setup()
    {
        parent::setUp();
        $this->userRepo = new Fototop\Model\Entity\Repository\UserRepository();

        # clear all current database users
        DB::table("User")->delete();
    }

    public function tearDown()
    {
        parent::tearDown();
        DB::table("User")->delete();
    }

    public function testUserRepository_returnsFalseIfNoId()
    {
        # Act
        $result = $this->userRepo->findById(99999999);

        # Assert
        $this->assertFalse($result);
    }

    public function testUserRepository_savesNewUser()
    {
        # Arrange
        $testUser = new UserModel();
        $testUser->setEmail("test@test.com")
                 ->setUsername("testUser")
                 ->setFacebookID("gibberish123")
                 ->setPassword("password123");

        # Act
        $result = $this->userRepo->save($testUser);

        # Assert
        $this->assertTrue($result);

    }

    public function testUserRepository_updatesExistingUser()
    {
        # Arrange
        $testUser = new OrmUser();
        $testUser->Email = "test@test.com";
        $testUser->Username = "testUser";
        $testUser->Password = "password123";
        $testUser->FacebookID = "gibberish123";
        $testUser->UpdatedAt = date("Y-m-d h:i:s");
        $testUser->CreatedAt = date("Y-m-d h:i:s");
        $testUser->save();

        $persistedUser = $this->userRepo->findById($testUser->id);
        $persistedUser->setUsername("testsuccess");

        # Act
        $result = $this->userRepo->save($persistedUser);

        $postUpdateUser = OrmUser::find($testUser->id);

        # Assert
        $this->assertTrue($result);
        $this->assertEquals("testsuccess", $postUpdateUser->Username);
    }

    public function testUserRepository_failsUserWithInvalidId()
    {
        # Arrange
        $testUser = new OrmUser();
        $testUser->id = 9999;
        $testUser->Email = "test@test.com";
        $testUser->Username = "testUser";
        $testUser->Password = "password123";
        $testUser->FacebookID = "gibberish123";
        $testUser->UpdatedAt = date("Y-m-d h:i:s");
        $testUser->CreatedAt = date("Y-m-d h:i:s");

        $testModelUser = new UserModel($testUser);

        # Act
        $result = $this->userRepo->save($testModelUser);

        # Assert
        $this->assertNotNull($testUser->id);
        $this->assertFalse($result);
    }

    public function testUserRepository_canGetOneUser()
    {
        # Arrange
        $testUser = new OrmUser();
        $testUser->Email = "test@test.com";
        $testUser->Username = "testUser";
        $testUser->Password = "password123";
        $testUser->FacebookID = "gibberish123";
        $testUser->UpdatedAt = date("Y-m-d h:i:s");
        $testUser->CreatedAt = date("Y-m-d h:i:s");
        $testUser->save();

        # Act
        $user = $this->userRepo->findById($testUser->id);

        # Assert
        $this->assertEquals($testUser->id, $user->getId());
    }

    public function testUserRepository_canGetTwoUsers()
    {
        # Arrange
        $testUser1 = new OrmUser();
        $testUser1->Email = "test@test.com";
        $testUser1->Username = "testUser";
        $testUser1->Password = "password123";
        $testUser1->FacebookID = "gibberish123";
        $testUser1->UpdatedAt = date("Y-m-d h:i:s");
        $testUser1->CreatedAt = date("Y-m-d h:i:s");
        $testUser1->save();

        $testUser2 = new OrmUser();
        $testUser2->Email = "test@test.com";
        $testUser2->Username = "testUser";
        $testUser2->Password = "password123";
        $testUser2->FacebookID = "gibberish456";
        $testUser2->UpdatedAt = date("Y-m-d h:i:s");
        $testUser2->CreatedAt = date("Y-m-d h:i:s");
        $testUser2->save();

        # Act
        $users = $this->userRepo->findAll();

        # Assert
        $this->assertTrue(is_array($users));
        $this->assertCount(2, $users);
    }

    public function testUserRepository_findAllReturnsFalseIfNoUsers()
    {
        # Act
        $users = $this->userRepo->findAll();

        # Assert
        $this->assertCount(0, $users);
    }

    public function testUserRepository_deleteUser()
    {
        # Arrange
        $testUser = new OrmUser();
        $testUser->Email = "test@test.com";
        $testUser->Username = "testUser";
        $testUser->Password = "password123";
        $testUser->FacebookID = "gibberish123";
        $testUser->UpdatedAt = date("Y-m-d h:i:s");
        $testUser->CreatedAt = date("Y-m-d h:i:s");
        $testUser->save();

        $modelUser = new \Fototop\Model\Entity\User($testUser);

        # Act
        $this->userRepo->delete($modelUser);

        $result = OrmUser::find($modelUser->getId());

        # Assert
        $this->assertNull($result);
    }
}
