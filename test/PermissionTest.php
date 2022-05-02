<?php declare(strict_types=1);

namespace TEST;

use APP\Auth\Src\ConsoleDebug;
use APP\Auth\Src\Permission;
use APP\Auth\Src\PermissionDebugger;
use PHPUnit\Framework\TestCase;
use TEST\Helpers\AlwaysNoVoter;
use TEST\Helpers\AlwaysYesVoter;
use TEST\Helpers\SpecificVoter;
use TEST\Helpers\TestPosts;
use TEST\Helpers\TestUser;
use TEST\Helpers\AuthorVoter;

class PermissionTest extends TestCase {

    public function testEmptyVoters() {

        $permission = new Permission();
        $user = new TestUser();
        $this->assertFalse($permission->can($user, 'demo'));
    }

    public function testWithTrueVoter() {
        $permission = new Permission();
        $user = new TestUser();
        $permission->addVoter(new AlwaysYesVoter());
        $this->assertTrue($permission->can($user, 'demo'));
    }

    public function testWithFalseVoter() {
        $permission = new Permission();
        $user = new TestUser();
        $permission->addVoter(new AlwaysNoVoter());
        $this->assertFalse($permission->can($user, 'demo'));
    }

    public function testWithMultipleVoter() {
        $permission = new Permission();
        $user = new TestUser();
        $permission->addVoter(new AlwaysNoVoter());
        $permission->addVoter(new AlwaysNoVoter());
        $permission->addVoter(new AlwaysNoVoter());
        $permission->addVoter(new AlwaysYesVoter());
        $permission->addVoter(new AlwaysNoVoter());
        $this->assertTrue($permission->can($user, 'demo'));
    }

    public function testWithSpecificVoter() {
        $permission = new Permission();
        $user = new TestUser();
        $permission->addVoter(new SpecificVoter());
        $this->assertTrue($permission->can($user, 'specific'));
        $this->assertFalse($permission->can($user, 'demo'));
    }

    public function testWithSpecificConditionVoter() {
        $permission = new Permission();
        $user = new TestUser();
        $post = new TestPosts($user);

        $user2 = new TestUser();

        $permission->addVoter(new AuthorVoter());
        $this->assertTrue($permission->can($user, AuthorVoter::EDIT, $post));
        $this->assertFalse($permission->can($user2, AuthorVoter::EDIT, $post));
    }

    /**
    public function testDebugge() {

        $debugger = $this->getMockBuilder(PermissionDebugger::class)->getMock();

        $debugger->expects($this->exactly(5))->method("debug");

        $permissions = new Permission($debugger);
        $user = new TestUser();

        $permissions->addVoter(new AlwaysNoVoter());
        $permissions->addVoter(new AlwaysNoVoter());
        $permissions->addVoter(new AlwaysNoVoter());
        $permissions->addVoter(new AlwaysNoVoter());
        $permissions->addVoter(new AlwaysYesVoter());
        $permissions->addVoter(new AlwaysNoVoter());

        $permissions->can($user, 'edit');
    }


    public function testConsoleDebugge() {

        $permission = new Permission(new ConsoleDebug());
        $user = new TestUser();

        $permission->addVoter(new AlwaysNoVoter());
        $permission->addVoter(new AlwaysNoVoter());
        $permission->addVoter(new AlwaysNoVoter());
        $permission->addVoter(new AlwaysNoVoter());
        $permission->addVoter(new AlwaysYesVoter());
        $permission->addVoter(new AlwaysNoVoter());


        $this->assertTrue($permission->can($user, 'edit_post'));
    }
    */

}