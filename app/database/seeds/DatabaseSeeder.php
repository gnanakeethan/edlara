<?php

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tutorials')->delete();
        Eloquent::unguard();

        try {
            // Create the group
            $group = Sentry::getGroupProvider()->create([
            'name'            => 'admin',
                'permissions' => [
                    'admin' => 1,
                    ],
            ]);
        } catch (Cartalyst\Sentry\Groups\NameRequiredException $e) {
            echo 'Name field is required';
        } catch (Cartalyst\Sentry\Groups\GroupExistsException $e) {
            echo 'Group already exists';
        }

        try {
            // Create the group
            $group = Sentry::getGroupProvider()->create([
            'name'            => 'teachers',
                'permissions' => [
                    'create_tutorial'=> 1,
                    'update_tutorial'=> 1,
                    'create_exam'    => 1,
                    'update_exam'    => 1,
                    'see_results'    => 1,
                    'see_result'     => 1,
                    ],
            ]);
        } catch (Cartalyst\Sentry\Groups\NameRequiredException $e) {
            echo 'Name field is required';
        } catch (Cartalyst\Sentry\Groups\GroupExistsException $e) {
            echo 'Group already exists';
        }

        try {
            // Create the group
            $group = Sentry::getGroupProvider()->create([
            'name'            => 'students',
                'permissions' => [
                    'see_tutorial'=> 1,
                    'do_exam'     => 1,
                    'see_result'  => 1,
                    ],
            ]);
        } catch (Cartalyst\Sentry\Groups\NameRequiredException $e) {
            echo 'Name field is required';
        } catch (Cartalyst\Sentry\Groups\GroupExistsException $e) {
            echo 'Group already exists';
        }

        try {
            // Create the user
            $user = Sentry::getUserProvider()->create([
                 'email'       => 'johndoe@example.com',
                 'password'    => 'user123456',
                 'activated'   => '1',
                 'first_name'  => 'John',
                 'last_name'   => 'Doe',
                 'permissions' => [
                             'user.create' => 1,
                             'user.delete' => 1,
                             'user.view'   => 1,
                             'user.update' => 1, ], ]);

            // Find the group using the group id
            $adminGroup = Sentry::getGroupProvider()->findById(1);

            // Assign the group to the user
            $user->addGroup($adminGroup);
        } catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
            echo 'Login field is required.';
        } catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
            echo 'Password field is required.';
        } catch (Cartalyst\Sentry\Users\UserExistsException $e) {
            echo 'User with this login already exists.';
        } catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
            echo 'Group was not found.';
        }
        $admin = Sentry::getGroupProvider()->findByName('admin');
        $tea = Sentry::getGroupProvider()->findByName('teachers');
        $stu = Sentry::getGroupProvider()->findByName('students');

        $user = Sentry::getUserProvider()->findById(1);
        $user->addGroup($admin);
        $user->addGroup($tea);
        $user->addGroup($stu);
        unset($admin);
        unset($user);
        $this->call('TeacherTableSeeder');
        $this->call('StudentTableSeeder');
        $this->call('SubjectTableSeeder');
    }
}
