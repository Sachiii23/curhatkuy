import os, json
try:
    import google.generativeai as genai
except Exception as e:
    print('ERROR_IMPORT', e)
    raise
key = os.environ.get('GEMINI_API_KEY')
print('GEMINI_API_KEY set:', bool(key))
if not key:
    print('No key in environment; aborting')
else:
    genai.configure(api_key=key)
    try:
        # list_models may return a generator/iterable; convert to list first
        models = list(genai.list_models())
        # Try to serialize the models; if some objects are not serializable,
        # print a simplified list containing model names and supported methods.
        try:
            print(json.dumps(models, indent=2, ensure_ascii=False))
        except TypeError:
            simple = []
            for m in models:
                # Each model object may be a dict-like or an object; try to extract useful fields
                try:
                    name = m.get('name') if isinstance(m, dict) else getattr(m, 'name', str(m))
                except Exception:
                    name = str(m)
                # Attempt to get supported methods/capabilities if present
                try:
                    methods = m.get('methods') if isinstance(m, dict) else getattr(m, 'methods', None)
                except Exception:
                    methods = None
                simple.append({'name': name, 'methods': methods})
            print(json.dumps(simple, indent=2, ensure_ascii=False))
    except Exception as e:
        import traceback
        print('EXCEPTION listing models:')
        traceback.print_exc()
