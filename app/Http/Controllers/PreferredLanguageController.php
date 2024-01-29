<?php
namespace App\Http\Controllers;
use App\Models\Languages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PreferredLanguageController extends Controller
{
    public function insertPreferredLanguage(Request $request)
    {
        try {
            // Validation Block
            $validator = Validator::make($request->all(), [
                'language' => 'required',
            ]);

            // Check if validation fails
            if ($validator->fails()) {
                return response()->json(['error' => 'Invalid input.'], 422);
            }

            // Retrieve 'language' input
            $language = $request->input('language');

            // Database Interaction
            $lang = new Languages();
            $lang->language = $language;
            $lang->save();

            // Successful Response
            return response()->json(['message' => 'Language saved successfully.', 'data' => $lang]);
        } catch (\Exception $e) {
            // Exception Handling
            return response()->json(['error' => 'Unable to save language.'], 500);
        }
    }
}
