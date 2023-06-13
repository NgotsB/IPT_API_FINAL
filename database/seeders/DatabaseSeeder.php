<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::factory()
            ->create(
                [
                    'name' => 'Admin',
                    'email' => 'admin@gmail.com',
                    'role' => 'Admin',
                    'password' => bcrypt('admin123'),
                ]
            );


        // Category Seeds
        Category::factory()
            ->create(
                [
                    'name' => 'Laravel',
                    'level' => '1',
                    'instructions' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur qui tempore repellat corporis unde omnis odio similique, obcaecati maxime aut eius quaerat fuga rem cupiditate recusandae sapiente in, voluptate mollitia.',
                ]
            );

        Category::factory()
            ->create(
                [
                    'name' => 'Flutter',
                    'level' => '2',
                    'instructions' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur qui tempore repellat corporis unde omnis odio similique, obcaecati maxime aut eius quaerat fuga rem cupiditate recusandae sapiente in, voluptate mollitia.',
                ]
            );

        Category::factory()
            ->create(
                [
                    'name' => 'Angular',
                    'level' => '1',
                    'instructions' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur qui tempore repellat corporis unde omnis odio similique, obcaecati maxime aut eius quaerat fuga rem cupiditate recusandae sapiente in, voluptate mollitia.',
                ]
            );

        Category::factory()
            ->create(
                [
                    'name' => 'Python',
                    'level' => '2',
                    'instructions' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur qui tempore repellat corporis unde omnis odio similique, obcaecati maxime aut eius quaerat fuga rem cupiditate recusandae sapiente in, voluptate mollitia.',
                ]
            );

        Category::factory()
            ->create(
                [
                    'name' => 'Django',
                    'level' => '2',
                    'instructions' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur qui tempore repellat corporis unde omnis odio similique, obcaecati maxime aut eius quaerat fuga rem cupiditate recusandae sapiente in, voluptate mollitia.',
                ]
            );

        Category::factory()
            ->create(
                [
                    'name' => 'Java',
                    'level' => '5',
                    'instructions' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur qui tempore repellat corporis unde omnis odio similique, obcaecati maxime aut eius quaerat fuga rem cupiditate recusandae sapiente in, voluptate mollitia.',
                ]
            );

        Category::factory()
            ->create(
                [
                    'name' => 'PHP',
                    'level' => '5',
                    'instructions' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur qui tempore repellat corporis unde omnis odio similique, obcaecati maxime aut eius quaerat fuga rem cupiditate recusandae sapiente in, voluptate mollitia.',
                ]
            );

        Category::factory()
            ->create(
                [
                    'name' => 'C++',
                    'level' => '15',
                    'instructions' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur qui tempore repellat corporis unde omnis odio similique, obcaecati maxime aut eius quaerat fuga rem cupiditate recusandae sapiente in, voluptate mollitia.',
                ]
            );

        Category::factory()
            ->create(
                [
                    'name' => 'Visual Basic .NET',
                    'level' => '3',
                    'instructions' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur qui tempore repellat corporis unde omnis odio similique, obcaecati maxime aut eius quaerat fuga rem cupiditate recusandae sapiente in, voluptate mollitia.',
                ]
            );

        Category::factory()
            ->create(
                [
                    'name' => 'C#',
                    'level' => '3',
                    'instructions' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur qui tempore repellat corporis unde omnis odio similique, obcaecati maxime aut eius quaerat fuga rem cupiditate recusandae sapiente in, voluptate mollitia.',
                ]
            );

        Category::factory()
            ->create(
                [
                    'name' => 'Ruby',
                    'level' => '5',
                    'instructions' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur qui tempore repellat corporis unde omnis odio similique, obcaecati maxime aut eius quaerat fuga rem cupiditate recusandae sapiente in, voluptate mollitia.',
                ]
            );

        Category::factory()
            ->create(
                [
                    'name' => 'C',
                    'level' => '20',
                    'instructions' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur qui tempore repellat corporis unde omnis odio similique, obcaecati maxime aut eius quaerat fuga rem cupiditate recusandae sapiente in, voluptate mollitia.',
                ]
            );

        Category::factory()
            ->create(
                [
                    'name' => 'CSS',
                    'level' => '1',
                    'instructions' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur qui tempore repellat corporis unde omnis odio similique, obcaecati maxime aut eius quaerat fuga rem cupiditate recusandae sapiente in, voluptate mollitia.',
                ]
            );

        Category::factory()
            ->create(
                [
                    'name' => 'JQuery',
                    'level' => '3',
                    'instructions' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur qui tempore repellat corporis unde omnis odio similique, obcaecati maxime aut eius quaerat fuga rem cupiditate recusandae sapiente in, voluptate mollitia.',
                ]
            );

        Category::factory()
            ->create(
                [
                    'name' => 'React Native',
                    'level' => '6',
                    'instructions' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur qui tempore repellat corporis unde omnis odio similique, obcaecati maxime aut eius quaerat fuga rem cupiditate recusandae sapiente in, voluptate mollitia.',
                ]
            );


        // Question Seeds
        Question::factory()
            ->create(
                [
                    'number' => '1',
                    'content' => 'What is FLutter?',
                    'category_id' => '2',
                ]
            );

        // Answer Seeds
        Answer::factory()
            ->create(
                [
                    'question_id' => '1',
                    'letter' => 'A',
                    'content' => 'Flutter is an open-source DBMS',
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '1',
                    'letter' => 'B',
                    'content' => 'Flutter is an open-source UI-toolkit',
                    'is_correct' => 1,
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '1',
                    'letter' => 'C',
                    'content' => 'Flutter is an open-source backend toolkit',
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '1',
                    'letter' => 'D',
                    'content' => 'All of the above',
                ]
            );




        Question::factory()
            ->create(
                [
                    'number' => '2',
                    'content' => 'Flutter is developed by ______.',
                    'category_id' => '2',
                ]
            );

        Answer::factory()
            ->create(
                [
                    'question_id' => '2',
                    'letter' => 'A',
                    'content' => 'Microsoft',
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '2',
                    'letter' => 'B',
                    'content' => 'Facebook',
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '2',
                    'letter' => 'C',
                    'content' => 'Google',
                    'is_correct' => 1,
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '2',
                    'letter' => 'D',
                    'content' => 'IBM',
                ]
            );



        Question::factory()
            ->create(
                [
                    'number' => '3',
                    'content' => 'Is Flutter a programming language?',
                    'category_id' => '2',
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '3',
                    'letter' => 'A',
                    'content' => 'Yes',
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '3',
                    'letter' => 'B',
                    'content' => 'No',
                    'is_correct' => '1',
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '3',
                    'letter' => 'C',
                    'content' => 'Maybe',
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '3',
                    'letter' => 'D',
                    'content' => "Can't Say",
                ]
            );



        Question::factory()
            ->create(
                [
                    'number' => '4',
                    'content' => 'Flutter is mainly optimized for ______ that can run on both Android and iOS platforms.',
                    'category_id' => '2',
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '4',
                    'letter' => 'A',
                    'content' => '2D mobile apps',
                    'is_correct' => 1,
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '4',
                    'letter' => 'B',
                    'content' => 'Desktop only',
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '4',
                    'letter' => 'C',
                    'content' => 'Tablet only',
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '4',
                    'letter' => 'D',
                    'content' => 'None of the above',
                ]
            );


        Question::factory()
            ->create(
                [
                    'number' => '5',
                    'content' => 'Is flutter a SDK?',
                    'category_id' => '2',
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '5',
                    'letter' => 'A',
                    'content' => 'Yes',
                    'is_correct' => 1,
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '5',

                    'letter' => 'B',
                    'content' => 'No',
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '5',

                    'letter' => 'C',
                    'content' => 'Maybe',
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '5',
                    'letter' => 'D',
                    'content' => "Can't Say",
                ]
            );



        Question::factory()
            ->create(
                [
                    'number' => '6',
                    'content' => 'SDK stands for ______.',
                    'category_id' => '2',
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '6',
                    'letter' => 'A',
                    'content' => "Software Development Knowledge",
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '6',
                    'letter' => 'B',
                    'content' => "Software Data Kit",
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '6',
                    'letter' => 'C',
                    'content' => "Software Development Kit",
                    'is_correct' => 1,
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '6',
                    'letter' => 'D',
                    'content' => "Software Database Kit",
                ]
            );



        Question::factory()
            ->create(
                [
                    'number' => '7',
                    'content' => 'What is Dart?',
                    'category_id' => '2',
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '7',
                    'letter' => 'A',
                    'content' => "Dart is a object-oriented programming language.",
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '7',
                    'letter' => 'B',
                    'content' => "Dart is used to create frontend user interfaces.",
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '7',
                    'letter' => 'C',
                    'content' => "Both A and B",
                    'is_correct' => 1,
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '7',
                    'letter' => 'D',
                    'content' => "None of the above",
                ]
            );



        Question::factory()
            ->create(
                [
                    'number' => '8',
                    'content' => 'What are the best editors for Flutter development?',
                    'category_id' => '2',
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '8',
                    'letter' => 'A',
                    'content' => "Android Studio",
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '8',
                    'letter' => 'B',
                    'content' => "IntelliJ IDEA",
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '8',
                    'letter' => 'C',
                    'content' => "Visual Studio",
                ]
            );
        Answer::factory()
            ->create(
                [
                    'question_id' => '8',
                    'letter' => 'D',
                    'content' => "All of the above",
                    'is_correct' => 1,
                ]
            );



        Question::factory()->create(
            [
                'number' => '9',
                'content' => 'The Dart language can be complied _______.',
                'category_id' => '2',
            ]
        );
        Answer::factory()->create(
            [
                'question_id' => '9',
                'letter' => 'A',
                'content' => "AOT",
            ]
        );
        Answer::factory()->create(
            [
                'question_id' => '9',
                'letter' => 'B',
                'content' => "JIT",
            ]
        );
        Answer::factory()->create(
            [
                'question_id' => '9',
                'letter' => 'C',
                'content' => "Both AOT and JIT",
                'is_correct' => 1,

            ]
        );
        Answer::factory()->create(
            [
                'question_id' => '9',
                'letter' => 'D',
                'content' => "None of the above",
            ]
        );





        Question::factory()
            ->create(
                [
                    'number' => '1',
                    'content' => 'What is Django?',
                    'category_id' => '5',
                ]
            );
        Answer::factory()->create(
            [
                'question_id' => '10',
                'letter' => 'A',
                'content' => "Django is a PHP backend framework.",
            ]
        );
        Answer::factory()->create(
            [
                'question_id' => '10',
                'letter' => 'B',
                'content' => "Django is a programming language",
            ]
        );
        Answer::factory()->create(
            [
                'question_id' => '10',
                'letter' => 'C',
                'content' => "Django is a Python web framework.",
                'is_correct' => 1,
            ]
        );
        Answer::factory()->create(
            [
                'question_id' => '10',
                'letter' => 'D',
                'content' => "All of the above",
            ]
        );








        // Category::factory(8)->create();
        // Question::factory(8)->create();
        // Answer::factory(20)->create();


    }
}
