# Steps
1. Create virtual environment
```python -m venv .venv```
2. Activate virtual environment
* For Windows
```.venv\Scripts\Activate.ps1```
* For Linux, MacOS, etc
```source .venv/bin/activate```
3. Install from requirements.txt
```pip install -r requirements.txt```
4. Run the project using
```uvicorn main:app --reload --port 8080```
# Additional
5. To add new libraries to the repository
```pip freeze > requirements.txt```
