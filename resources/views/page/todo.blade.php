@extends('layouts.indexLayout')

@section('content')
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Левая колонка - Форма -->
            <div class="lg:col-span-1">
                <div class="bg-dark-lighter rounded-xl p-6 shadow-lg border border-gray-800">
                    <h2 class="text-2xl font-semibold mb-6 text-blue-300">Создать задачу</h2>
                    
                    <form action="{{ route('create') }}" method="POST" class="space-y-4">
                        @csrf
                        
                        <div>
                            <label for="title" class="block text-sm font-medium mb-2 text-gray-300">
                                Название
                            </label>
                            <input 
                                type="text" 
                                id="title" 
                                name="title" 
                                required
                                class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none"
                                placeholder="Что нужно сделать?"
                            >
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium mb-2 text-gray-300">
                                Описание
                            </label>
                            <textarea 
                                id="description" 
                                name="description" 
                                rows="3"
                                class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none resize-none"
                                placeholder="Описание задачи"
                            ></textarea>
                        </div>
                        <button 
                            type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-lg transition duration-200 mt-4"
                        >
                            Добавить задачу
                        </button>
                    </form>

                    <!-- Статистика -->
                    <div class="mt-8 pt-6 border-t border-gray-800">
                        <h3 class="text-lg font-medium mb-3 text-gray-300">Статус</h3>
                        <div class="grid grid-cols-3 gap-3">
                            <div class="bg-gray-800/50 p-3 rounded-lg">
                                <p class="text-xs text-gray-400">Всего</p>
                                <p class="text-lg font-bold">---</p>
                            </div>
                            <div class="bg-gray-800/50 p-3 rounded-lg">
                                <p class="text-xs text-gray-400">Активные</p>
                                <p class="text-lg font-bold text-blue-400">------</p>
                            </div>
                            <div class="bg-gray-800/50 p-3 rounded-lg">
                                <p class="text-xs text-gray-400">Выполнено</p>
                                <p class="text-lg font-bold text-green-400">-------</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Правая колонка - Список задач -->
            <div class="lg:col-span-2">
                <!-- Фильтры -->
                <div class="flex flex-wrap gap-2 mb-6">
                    <a href="" 
                       class="px-4 py-2 bg-blue-600 text-white rounded-lg font-medium">
                        Все задачи
                    </a>
                    <a href="" 
                       class="px-4 py-2 bg-gray-800 hover:bg-gray-700 rounded-lg transition">
                        Активные
                    </a>
                    <a href="" 
                       class="px-4 py-2 bg-gray-800 hover:bg-gray-700 rounded-lg transition">
                        Выполненные
                    </a>
                </div>

                <!-- Список задач -->
                <div class="space-y-4">
                    @if(isset($tasks))
                        @foreach($tasks as $task)
                            <div class="bg-dark-lighter rounded-xl p-5 border border-gray-800 hover:border-gray-700 transition duration-200">
                                <div class="flex justify-between items-start">
                                    
                                    <!-- Заголовок и метка приоритета -->
                                    <div class="flex items-start gap-3">
                                        @if($task->status)
                                            <svg class="w-6 h-6 text-green-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        @else
                                            <div class="w-6 h-6 border-2 border-gray-600 rounded-full mt-0.5"></div>
                                        @endif
                                        
                                        <div>
                                            <h3 class="text-xl font-semibold mb-1 {{ $task->status ? 'text-gray-500 line-through' : 'text-white' }}">
                                                {{ $task->title }}
                                            </h3>
                                            
                                        </div>
                                    </div>
    
                                </div>
                                
                                <!-- Описание -->

                                    <p class="mt-3 text-gray-400 ml-9">{{ $task->description }}</p>

                                
                                <!-- Кнопки действий -->
                                <div class="flex justify-end gap-2 mt-4">
                                    <!-- Форма для отметки выполнения -->
                                    <form action="" method="POST" class="inline">
                                        @csrf

                                        <button type="submit" class="px-4 py-2 {{ $task->completed ? 'bg-gray-700 hover:bg-gray-600' : 'bg-green-600 hover:bg-green-700' }} text-white rounded-lg transition">
                                            Выполнить
                                        </button>
                                    </form>
                                    
                                    <!-- Кнопка редактирования -->
                                    <a href="{{ url('/tasks/'.$task->id) }}" 
                                       class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition">
                                        Редактировать
                                    </a>
                                    
                                    <!-- Форма удаления -->
                                    <form action="{{ url('/tasks/'.$task->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                onclick="return confirm('Удалить задачу?')"
                                                class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition">
                                            Удалить
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Состояние пустого списка -->
                        <div class="bg-dark-lighter rounded-xl p-8 border border-gray-800 text-center">
                            <svg class="w-16 h-16 text-gray-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                            <h3 class="text-xl font-medium text-gray-400 mb-2">Нет задач</h3>
                            <p class="text-gray-500">Создайте свою первую задачу</p>
                        </div>
                    @endif
                </div>

            </div>
        </div>
@endsection
