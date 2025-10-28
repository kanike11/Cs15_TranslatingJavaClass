class Dog:
    def __init__(self, name, age):
        self.name = name
        self.age = age
        
    def bark(self):
        print("Woof! Woof!") 
        
    def celebrate_birthday(self):
        self.age += 1
        print(f"Happy Birthday! {self.name} is now {self.age} years old.")
        
    def show_info(self):
        print(f"Dog Name: {self.name}, Age: {self.age}")
        
        
if __name__ == "__main__":
    my_dog = Dog("Cooper", 8)
    my_dog.bark()
    my_dog.celebrate_birthday()
    my_dog.show_info()