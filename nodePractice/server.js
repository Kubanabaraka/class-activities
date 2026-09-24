import { error } from "console";
import express from "express";
import fs from "fs/promises";
import path, { dirname } from "path";
import { json } from "stream/consumers";
import { fileURLToPath } from "url";
const app = express();
app.use(express.json());
const PORT = 3000;

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const jsonFile = path.join(__dirname, "../Exercise(DataFormats)/customer.json");

async function getStudentsData() {
  const rawData = await fs.readFile(jsonFile, "utf-8");
  return JSON.parse(rawData);
}
app.listen(PORT, () => {
  console.log(`Server is listening on port ${PORT}`);
});

app.post("/create", async (req, res) => {
  try {
    const students = await getStudentsData();

    const { name, nid, email } = req.body;

    if (!name) {
      return res.status(400).json({ error: "Name should be provided." });
    }

    const newStudent = {
      id: students.length > 0 ? students[students.length - 1].id + 1 : 1,
      name: name || null,
      nid: nid || null,
      email: email || null,
    };

    students.push(newStudent);

    await fs.writeFile(jsonFile, JSON.stringify(students, null, 2), "utf-8");
    res.status(201).json(newStudent, { message: "Student created" });
  } catch (error) {
    res.status(500).json({ error: "Failed to write into a file" });
  }
});

app.get("/students", async (req, res) => {
  try {
    const students = await getStudentsData();
    res.json(students);
  } catch (error) {
    res.status(500).json({ error: "failed to read data" });
  }
});

app.delete("/student/:id", async (req, res) => {
  try {
    const student_id = Number(req.params.id);
    const students = await getStudentsData();

    const isExist = students.some((student) => student.id === student_id);
    if (!isExist) {
      res
        .status(404)
        .json({ error: "Student you are trying to delete was not found" });
    }
    const updatedStudent = students.filter(
      (student) => student.id !== student_id,
    );
    await fs.writeFile(
      jsonFile,
      JSON.stringify(updatedStudent, null, 2),
      "utf-8",
    );
    res.status(204).json({ message: "Record deleted" });
  } catch (error) {
    res.status(500).json({ error: "Failed to delete the record" });
  }
});

app.patch("/student/:id", async (req, res) => {
  try {
    const student_id = Number(req.params.id);

    const students = await getStudentsData();

    const studentIndex = students.findIndex(
      (student) => student.id === student_id,
    );
    const { name, email } = req.body;
    students[studentIndex] = {
      ...students[studentIndex],
      ...req.body,
      id: student_id,
    };

    await fs.writeFile(jsonFile, JSON.stringify(students, null, 2), "utf-8");
    res.json(students[studentIndex]);
  } catch (error) {
    res.status(500).json({ error: "Failed to update the record" });
  }
});
