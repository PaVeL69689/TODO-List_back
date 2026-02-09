@extends('layouts.indexLayout')

@section('content')

        <div class="bg-dark-lighter rounded-xl shadow-lg border border-gray-800 p-6">
            <h1 class="text-3xl font-bold mb-2">Редактирование задачи</h1>
            <p class="text-gray-400 mb-8">Изменение задачи "{{ $task->title }}"</p>

            <form action="{{ url('/tasks/'.$task->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="space-y-6">
                    <!-- Название -->
                    <div>
                        <label for="title" class="block text-lg font-medium mb-2 text-gray-300">
                            Название задачи
                        </label>
                        <input 
                            type="text" 
                            id="title" 
                            name="title" 
                            value="{{ old('title', $task->title) }}"
                            
                            class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition text-lg"
                            placeholder="Название задачи"
                        >
                        @error('title')
                            <p class="mt-1 text-red-400 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Описание -->
                    <div>
                        <label for="description" class="block text-lg font-medium mb-2 text-gray-300">
                            Подробное описание
                        </label>
                        <textarea 
                            id="description" 
                            name="description" 
                            rows="5"
                            class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition resize-none"
                            placeholder="Детальное описание задачи..."
                        >{{ old('description', $task->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-red-400 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Кнопки действий -->
                <div class="flex flex-wrap gap-4 mt-10 pt-6 border-t border-gray-800">
                    <button type="submit" 
                            class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition">
                        Сохранить изменения
                    </button>
                    
                    <a href="{{ url('/tasks') }}" 
                       class="px-8 py-3 bg-gray-800 hover:bg-gray-700 text-white font-semibold rounded-lg transition">
                        Отмена
                    </a>

                </div>
            </form>
        </div>

@endsection